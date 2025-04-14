<!-- Sidebar -->
<div class="w-64 h-screen bg-white shadow-md">
    <div class="p-4 font-bold text-lg border-b">KLINIK</div>
    <ul class="mt-4 space-y-2 px-4">
        <li><a href="{{ route('dashboard') }}" class="block py-2 hover:text-blue-600">Dashboard</a></li>

        @if(auth()->user()->roles->first()?->name === 'admin')
        <li><a href="{{ route('users.index') }}" class="block py-2 hover:text-blue-600">Manajemen User</a></li>
        <li><a href="{{ route('pegawai.index') }}" class="block py-2 hover:text-blue-600">Manajemen Pegawai</a></li>
        <li><a href="{{ route('wilayah.index') }}" class="block py-2 hover:text-blue-600">Manajemen Wilayah</a></li>
        <li><a href="{{ route('tindakan.index') }}" class="block py-2 hover:text-blue-600">Manajemen Tindakan</a></li>
        <li><a href="{{ route('obat.index') }}" class="block py-2 hover:text-blue-600">Manajemen Obat</a></li>
        <li><a href="{{ route('laporan.index') }}" class="block py-2 hover:text-blue-600">Laporan</a></li>
        @elseif(auth()->user()->roles->first()?->name === 'petugas')
        <li><a href="{{ route('pendaftaran.pasien.index') }}" class="block py-2 hover:text-blue-600">Pendaftaran
                Pasien</a></li>
        @elseif(auth()->user()->roles->first()?->name === 'dokter')
        <li><a href="{{ route('dokter.tindakan') }}" class="block py-2 hover:text-blue-600">Input Tindakan & Resep</a>
        </li>
        @elseif(auth()->user()->roles->first()?->name === 'kasir')
        <li><a href="{{ route('kasir.tagihan') }}" class="block py-2 hover:text-blue-600">Pembayaran Pasien</a></li>
        @endif
    </ul>
</div>