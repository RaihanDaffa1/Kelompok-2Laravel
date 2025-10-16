<div class="space-y-3">
    <div>
        <label class="block text-sm font-medium text-gray-700">NIP</label>
        <input type="text" name="nip" value="{{ old('nip', $teacher->nip) }}" class="w-full border rounded-lg p-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $teacher->nama_lengkap) }}" class="w-full border rounded-lg p-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Jabatan</label>
        <input type="text" name="jabatan" value="{{ old('jabatan', $teacher->jabatan) }}" class="w-full border rounded-lg p-2">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">No HP</label>
        <input type="text" name="no_hp" value="{{ old('no_hp', $teacher->no_hp) }}" class="w-full border rounded-lg p-2">
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email" value="{{ old('email', $teacher->email) }}" class="w-full border rounded-lg p-2" required>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Alamat</label>
        <textarea name="alamat" class="w-full border rounded-lg p-2">{{ old('alamat', $teacher->alamat) }}</textarea>
    </div>
    <div>
        <label class="block text-sm font-medium text-gray-700">Status Aktif</label>
        <select name="is_active" class="w-full border rounded-lg p-2">
            <option value="1" {{ old('is_active', $teacher->is_active) == 1 ? 'selected' : '' }}>Aktif</option>
            <option value="0" {{ old('is_active', $teacher->is_active) == 0 ? 'selected' : '' }}>Nonaktif</option>
        </select>
    </div>
    <div class="flex justify-end gap-2 mt-4">
        <a href="{{ route('teacher.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400">Batal</a>
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
            Simpan
        </button>
    </div>
</div>
