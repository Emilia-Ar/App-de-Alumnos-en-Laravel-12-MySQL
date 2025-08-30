<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        return view('profile.show', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            // Borrar foto anterior si existe
            if ($user->photo_path && Storage::disk('public')->exists($user->photo_path)) {
                Storage::disk('public')->delete($user->photo_path);
            }
            $data['photo_path'] = $request->file('photo')->store('photos', 'public');
        }

        $user->update([
            'name' => $data['name'],
            'phone' => $data['phone'] ?? null,
            'professional_url' => $data['professional_url'] ?? null,
            'photo_path' => $data['photo_path'] ?? $user->photo_path,
        ]);

        return redirect()->route('profile.show')->with('status', 'Perfil actualizado correctamente.');
    }
}
