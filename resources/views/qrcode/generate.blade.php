<x-layout>
    <x-slot:title>
        {{$title}}
    </x-slot:title>

    <div class="container mx-auto flex justify-center items-center h-screen">
        <div class="row flex justify-center flex-col items-center">
            <h1 class="font-semibold text-3xl mb-3">Kode Qr {{$qrcode->village->name}}</h1>
            {{QrCode::generate("https://tamudesa.id/form/$qrcode->village_code/" . $qrcode->village->name)}}
        </div>
    </div>
    <script>
        window.print();
    </script>
</x-layout>