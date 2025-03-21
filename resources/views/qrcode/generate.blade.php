<x-layout>
    <x-slot:title>
        {{$title}}
    </x-slot:title>
    {{-- qrcode --}}
    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="row flex justify-center flex-col items-center">
            <h1 class="font-semibold text-3xl md:text-5xl mb-5">tamudesa.id</h1>
            {{QrCode::size(180)->generate($qrcode->qr_code)}}
            <p class="w-[350px] my-4 text-center text-xl md:text-2xl">Desa {{Str::ucfirst($qrcode->village->name)}}, Kecamatan {{$qrcode->subdistrict->name}}, {{$qrcode->district->name}}</p>
        </div>
    </div>
</x-layout>
