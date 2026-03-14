<x-border-form :title="__('Pengkajian')" :align="__('start')" :bgcolor="__('bg-gray-50')">
    <div class="mt-4 divide-y divide-gray-100 dark:divide-gray-700">

        {{-- Perawat Penerima --}}
        <div class="py-3 grid grid-cols-3 gap-2 items-start">
            <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Perawat Penerima</span>
            <span class="col-span-2 text-sm font-medium text-gray-800 dark:text-gray-200">
                {{ $dataDaftarPoliRJ['anamnesa']['pengkajianPerawatan']['perawatPenerima'] ?? '-' }}
            </span>
        </div>

        {{-- Waktu Datang --}}
        <div class="py-3 grid grid-cols-3 gap-2 items-start">
            <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Waktu Datang</span>
            <span class="col-span-2 text-sm font-medium text-gray-800 dark:text-gray-200">
                {{ $dataDaftarPoliRJ['anamnesa']['pengkajianPerawatan']['jamDatang'] ?? '-' }}
            </span>
        </div>

        {{-- Keluhan Utama --}}
        <div class="py-3 grid grid-cols-3 gap-2 items-start">
            <span class="text-xs font-medium text-gray-500 dark:text-gray-400">Keluhan Utama</span>
            <span class="col-span-2 text-sm text-gray-800 dark:text-gray-200 whitespace-pre-line">
                {{ $dataDaftarPoliRJ['anamnesa']['keluhanUtama']['keluhanUtama'] ?? '-' }}
            </span>
        </div>

    </div>
</x-border-form>
