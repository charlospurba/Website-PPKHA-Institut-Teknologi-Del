<!-- resources/views/web/LowonganKerja.blade.php -->
@include('components.navbar')

@extends('layouts.app')

@section('title', 'Lowongan Kerja - PPKHA IT Del')


<section id="lowongan-content" class="container py-5">
    @if ($lowongan && $lowongan->lowongan)
        <p class="text-center">{{ $lowongan->lowongan }}</p>
    @else
        <p class="text-center">Tidak ada data lowongan saat ini.</p>
    @endif
</section>

@include('components.footer')
