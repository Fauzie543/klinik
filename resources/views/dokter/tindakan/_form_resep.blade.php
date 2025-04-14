<form method="POST" action="{{ route('dokter.resep.store', $tindakan->id) }}" class="space-y-2">
    @csrf
    <div>
        <label for="obat_id" class="block text-sm font-medium">Obat:</label>
        <select name="obat_id" id="obat_id" class="w-full border-gray-300 rounded">
            @foreach ($obats as $obat)
            <option value="{{ $obat->id }}">{{ $obat->nama_obat }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="jumlah" class="block text-sm font-medium">Jumlah:</label>
        <input type="number" name="jumlah" required class="w-full border-gray-300 rounded">
    </div>

    <div>
        <label for="catatan" class="block text-sm font-medium">Catatan:</label>
        <input type="text" name="catatan" class="w-full border-gray-300 rounded">
    </div>

    <div>
        <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
            Tambahkan Obat
        </button>
    </div>
</form>