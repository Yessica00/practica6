<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// INICIO
Route::get('/', function () {
    return view('inicio');
})->name("inicio");

Route::get('/ayuda',function (){
    return view('ayuda');
})->name('ayuda');

Route::get('/contactanos',function (){
    return view('contactanos');
})->name('contactanos');

Route::get('/acerca',function (){
    return view('acerca');
})->name('acerca');




// INICIO 2
Route::get('/inicio2', function () {
    return view('inicio2');
})->middleware(['auth', 'verified'])->name('dashboard');


    // CATALOGO 
    Route::get('/catalogo',function (){
        return view('catalogo');
    })->middleware(['auth', 'verified'])->name('catalogo');

    Route::get('/horarios',function (){
        return view('horarios');
    })->middleware(['auth', 'verified'])->name('horarios');
    

    Route::get('/proyectosInd',function (){
        return view('proyectosInd');
    })->middleware(['auth', 'verified'])->name('proyectosInd');
    
        Route::get('/periodo',function (){
            return view('periodo');
        })->middleware(['auth', 'verified'])->name('periodo');

        Route::get('/carreras',function (){
            return view('carreras');
        })->middleware(['auth', 'verified'])->name('carreras');

        Route::get('/plaza',function (){
            return view('plaza');
        })->middleware(['auth', 'verified'])->name('plaza');

        Route::get('/puesto',function (){
            return view('puesto');
        })->middleware(['auth', 'verified'])->name('puesto');

        Route::get('/personal',function (){
            return view('personal');
        })->middleware(['auth', 'verified'])->name('personal');

        Route::get('/depto',function (){
            return view('depto');
        })->middleware(['auth', 'verified'])->name('depto');

        Route::get('/reticula',function (){
            return view('reticula');
        })->middleware(['auth', 'verified'])->name('reticula');

        Route::get('/materia',function (){
            return view('materia');
        })->middleware(['auth', 'verified'])->name('materia');

        Route::get('/alumno',function (){
            return view('alumno');
        })->middleware(['auth', 'verified'])->name('alumno');
    //    
    //HORARIOS
        Route::get('/docentes',function (){
            return view('docentes');
        })->middleware(['auth', 'verified'])->name('docentes');

        Route::get('/Halumnos',function (){
            return view('Halumnos');
        })->middleware(['auth', 'verified'])->name('Halumnos');
    //
    //PROYECTOS INDIVIDUALES
        Route::get('/capacitacion',function (){
            return view('capacitacion');
        })->middleware(['auth', 'verified'])->name('capacitacion');

        Route::get('/asesoria',function (){
            return view('asesoria');
        })->middleware(['auth', 'verified'])->name('asesoria');

        Route::get('/proyectos',function (){
            return view('proyectos');
        })->middleware(['auth', 'verified'])->name('proyectos');

        Route::get('/materialD',function (){
            return view('materialD');
        })->middleware(['auth', 'verified'])->name('materialD');
        
        Route::get('/docencia',function (){
            return view('docencia');
        })->middleware(['auth', 'verified'])->name('docencia');

        Route::get('/asesoriaProy',function (){
            return view('asesoriaProy');
        })->middleware(['auth', 'verified'])->name('asesoriaProy');

        Route::get('/asesoriaSS',function (){
            return view('asesoriaSS');
        })->middleware(['auth', 'verified'])->name('asesoriaSS');

    //TUTORIAS
       

        Route::get('/capacitacion',function (){
            return view('capacitacion');
        })->middleware(['auth', 'verified'])->name('capacitacion');
    //
    // INSTRUMENTACION Y TUTORIAS
    Route::get('/instrumentacion',function (){
        return view('instrumentacion');
    })->middleware(['auth', 'verified'])->name('instrumentacion');

    Route::get('/tutorias',function (){
        return view('tutorias');
    })->middleware(['auth', 'verified'])->name('tutorias');





Route::get('/dashboard', function () {
    return view('inicio2');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
