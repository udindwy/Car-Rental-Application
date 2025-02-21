       <div>
           <div class="container-fluid pt-4 px-4">
               <div class="row g-4">
                   <div class="col-sm-12 col-xl-12">
                       <div class="bg-light rounded h-100 p-4">
                           @if (session()->has('success'))
                               <div class="alert alert-success" role="alert">
                                   {{ session('success') }}
                               </div>
                           @endif
                           @if (session()->has('error'))
                               <div class="alert alert-danger" role="alert">
                                   {{ session('error') }}
                               </div>
                           @endif
                           <h6 class="mb-4">Data Mobil</h6>
                           <div class="row">
                               @foreach ($mobil as $data)
                                   <div class="col-md-4">
                                       <div class="card" style="width: 18rem;">
                                           <img src="{{ asset('storage/mobil/' . $data->foto) }}"
                                               style="height: 200px; width: 200px;" class="card-img-top" alt="...">
                                           <div class="card-body">
                                               <h5 class="card-title">{{ $data->merk }}</h5>
                                           </div>
                                           <ul class="list-group list-group-flush">
                                               <li class="list-group-item">No Polisi : {{ $data->nopolisi }}</li>
                                               <li class="list-group-item">Harga : {{ $data->harga }}</li>
                                               <li class="list-group-item">Kapasistas : {{ $data->kapasitas }}</li>
                                           </ul>
                                           <div class="card-body">
                                               <button wire:click="create({{ $data->id }},{{ $data->harga }})"
                                                   class="btn btn-outline-success card-link">Pilih Mobil</button>
                                           </div>
                                       </div>
                                   </div>
                               @endforeach
                           </div>
                           {{ $mobil->links() }}
                       </div>
                   </div>
               </div>
           </div>
           @if ($addPage)
               @include('transaksi.create')
           @endif
       </div>
