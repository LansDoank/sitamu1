<x-layout>
    <x-slot:title>
        {{$title}}
    </x-slot:title>
    {{-- qrcode --}}
    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="row flex justify-center flex-col items-center justify-center">
            <h1 class="font-semibold text-3xl md:text-5xl mb-4">tamudesa.id</h1>
            {{QrCode::size(200)->generate("https://tamudesa.id/form/$qrcode->village_code/" . $qrcode->village->name)}}
            <p class="w-[350px] my-3 text-center text-2xl">Desa {{$qrcode->village->name}},Kecamatan {{$qrcode->subdistrict->name}},{{$qrcode->district->name}}</p>
        </div>
    </div>
</x-layout>