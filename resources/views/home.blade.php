<x-layout>
    <h3 class="text-center my-4">Selamat Datang di Warung Pink</h3>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <x-card 
                    title="Nasi Goreng" 
                    text="Nasi Goreng Dengan Kemurnian Alami" 
                    image="https://sanex.co.id/wp-content/uploads/2024/11/2734.jpg" 
                    link="/products/NS"
                />
            </div>
            <div class="col-md-4 mb-3">
                <x-card 
                    title="Lengko Ndog" 
                    text="Perpaduan Lengko Dengan Telor Dadar Yang Nikmat" 
                    image="https://asset-2.tstatic.net/jabar/foto/bank/images/nasi-lengko-cirebon.jpg" 
                    link="/products/LN"
                />
            </div>
            <div class="col-md-4 mb-3">
                <x-card 
                    title="Campur Ndog" 
                    text="Perpaduan Lauk Seadanya Dengan Toping Telor Dadar" 
                    image="https://media-cdn.tripadvisor.com/media/photo-m/1280/15/21/2e/06/nasi-campur-telur-ceplok.jpg" 
                    link="/products/CN"
                />
            </div>
        </div>
    </div>

    <div class="text-center mt-4">
        <button class="btn btn-success px-4 py-2 fw-bold" onclick="showAlert()">🎉 Lihat Penawaran Spesial</button>
    </div>

    <div id="alertBox" class="alert alert-warning text-center mt-3 d-none" role="alert">
        Diskon besar-besaran hanya hari ini! Jangan sampai ketinggalan. 🎊
        <button type="button" class="btn-close float-end" aria-label="Close" onclick="hideAlert()"></button>
    </div>

    <script>
        function showAlert() {
            let alertBox = document.getElementById('alertBox');
            alertBox.classList.remove('d-none');
            alertBox.classList.add('d-block');
        }

        function hideAlert() {
            let alertBox = document.getElementById('alertBox');
            alertBox.classList.remove('d-block');
            alertBox.classList.add('d-none');
        }
    </script>
</x-layout>