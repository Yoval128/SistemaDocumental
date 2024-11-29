<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Usuario;

use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RolExport;

use Illuminate\Support\Facades\Notification;
use App\Notifications\VerificacionEmail;
use Illuminate\Support\Str;


class UsuarioController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }


    public function testLogin(Request $request)
    {
        $email = 'admin@hotmail.com'; // Email del usuario
        $password = '12345'; //contraseña real

        $user = Usuario::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            return "¡Login exitoso!";
        } else {
            return "Credenciales incorrectas.";
        }
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard', ['user' => $user]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Has cerrado sesión.');
    }

    public function usuario_index(Request $request)
    {
        $usuario = Usuario::Buscar($request->buscar)->paginate(5);

        $usuariosTotales = Usuario::all();

        $hombres = $usuariosTotales->where('sexo', 'Masculino')->count();
        $mujeres = $usuariosTotales->where('sexo', 'Femenino')->count();

        $usuariosActivos = $usuariosTotales->where('activo', 1)->count();
        $usuariosInactivos = $usuariosTotales->where('activo', 0)->count();

        $roles = $usuariosTotales->groupBy('rol')->map(function ($row) {
            return $row->count();
        });
        return view('usuario.usuario_index', [
            'usuario' => $usuario,
            'usuariosActivos' => $usuariosActivos,
            'usuariosInactivos' => $usuariosInactivos,
            'hombres' => $hombres,
            'mujeres' => $mujeres,
            'roles' => $roles
        ]);
    }

    public function usuario_alta()
    {
        return view('usuario.usuario_alta');
    }


    public function usuario_registrar(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required',
            'email' => 'required',
            'password' => 'required',
            'rol' => 'required',
            'activo' => 'nullable|boolean',
        ]);
    
        $img2 = "foto_default.jpg";
        if ($request->file('foto')) {
            $file = $request->file('foto');
            $img2 = time() . '_' . $file->getClientOriginalName();
            \Storage::disk('local')->put($img2, \File::get($file));
        }
    
        // Crear el usuario
        $usuario = Usuario::create([
            'nombre' => $request->input('nombre'),
            'apellidoP' => $request->input('apellidoP'),
            'apellidoM' => $request->input('apellidoM'),
            'sexo' => $request->input('sexo'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'rol' => $request->input('rol'),
            'foto' => $img2,
            'activo' => $request->input('activo') ? 1 : 0,
        ]);
    
        // Generar un código de verificación
        $token = Str::random(60); // Generar un token único
    
        // Almacenar el token en la base de datos, podrías agregar un campo en la tabla `usuarios` para guardar este token
        $usuario->update(['verification_token' => $token]);
    
        // Enviar el código por correo electrónico
        $usuario->notify(new VerificacionEmail($token));
    
        // Redirigir a la página de espera de verificación
        return redirect()->route('espera_verificacion')->with('success', 'Usuario creado con éxito. Revisa tu correo para verificar tu cuenta.');
    }
    

    public function verificarCodigo($token)
    {
        $usuario = Usuario::where('verification_token', $token)->first();

        if ($usuario) {
            $usuario->email_verified_at = now();
            $usuario->verification_token = null; // Limpiar el token
            $usuario->save();

            return redirect()->route('usuario_index')->with('success', 'Cuenta verificada exitosamente.');
        }

        return redirect()->route('usuario_index')->with('error', 'Código de verificación inválido.');
    }

    public function esperaVerificacion()
    {
        return view('auth.espera_verificacion');
    }


    public function usuario_eliminar(Usuario $id)
    {
        $id->delete();
        return redirect()->route('usuario_index');
    }

    public function usuario_modificar(Usuario $id)
    {
        return view('usuario.usuario_modificacion')->with('usuario', $id);
    }


    public function usuario_actualizar(Request $request, Usuario $id)
    {

        $this->validate($request, [
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'sexo' => 'required',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email',
            'password' => 'nullable',
            'rol' => 'required',
            'activo' => 'nullable|boolean',
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $img = $file->getClientOriginalName();
            $ldate = date('Ymd_His_');
            $img2 = $ldate . $img;
            \Storage::disk('local')->put($img2, \File::get($file));
        } else {
            $img2 = $id->foto;
        }

        $id->update([
            'nombre' => $request->input('nombre'),
            'apellidoP' => $request->input('apellidoP'),
            'apellidoM' => $request->input('apellidoM'),
            'sexo' => $request->input('sexo'),
            'fecha_nacimiento' => $request->input('fecha_nacimiento'),
            'email' => $request->input('email'),
            'rol' => $request->input('rol'),
            'foto' => $img2,
            'activo' => $request->input('activo') ? 1 : 0,
        ]);

        if ($request->filled('password')) {
            $id->password = bcrypt($request->input('password'));
            $id->save();
        }

        return redirect()->route('usuario_index')->with('success', 'Usuario actualizado con éxito.');
    }

    public function usuario_detalle($id)
    {
        $query = Usuario::find($id);
        return view('usuario.usuario_detalle')->with(['usuario' => $query]);
    }

    public function usuario_exportar_pdf()
    {
        $usuario = Usuario::all();
        $pdf = \PDF::loadView('usuario.pdf', compact('usuario'));
        return $pdf->download('usuario.pdf');
    }


    public function usuario_exportar_excel()
    {
        return Excel::download(new RolExport, 'tramite.xlsx');
    }
}
