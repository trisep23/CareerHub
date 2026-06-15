<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koneksi Terputus - CareerHub</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        body { font-family: 'Outfit', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-md w-full text-center bg-white rounded-3xl shadow-xl p-8 border border-slate-100">
        <div class="w-20 h-20 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636a9 9 0 010 12.728m0 0l-2.829-2.829m2.829 2.829L21 21M15.536 8.464a5 5 0 010 7.072m0 0l-2.829-2.829m-4.243 2.829a4.978 4.978 0 01-1.414-3.536 4.978 4.978 0 011.414-3.536M3 3l18 18"/>
            </svg>
        </div>
        
        <h1 class="text-2xl font-extrabold text-slate-800 mb-2">Koneksi Terputus</h1>
        <p class="text-slate-500 text-sm mb-6">Sepertinya perangkat Anda tidak terhubung ke internet. Beberapa fitur CareerHub memerlukan koneksi internet aktif.</p>
        
        <button onclick="window.location.reload();" class="w-full py-3 bg-blue-600 hover:bg-blue-700 text-white font-bold rounded-2xl shadow-lg shadow-blue-200 transition">
            Coba Lagi
        </button>
    </div>
</body>
</html>
