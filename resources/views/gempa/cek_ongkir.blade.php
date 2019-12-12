<form action="{{ route('gempa.ongkir.price', ['lat'=>$lat, 'lon'=>$lon]) }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-12">

            <div class="form-group">
                <label for="dari_kota">Asal Kota Gempa</label>
                <input class="form-control" value="{{ $destination['type'] . ' ' .$destination['city_name'] . ', ' .$destination['province'] }}" disabled>
                <select class="form-control d-none" id="dari_kota" name="origin" style="width: 100%;"
                        data-placeholder="Pilih Kota..">
                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    <option value="{{ $destination['city_id'] }}" selected>{{ $destination['type'] . ' ' .$destination['city_name'] . ', ' .$destination['province'] }}</option>
                </select>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="tujuan_kota">Tujuan Kota</label>
                <select class="js-select2 form-control" id="tujuan_kota" name="destination" style="width: 100%;"
                        data-placeholder="Pilih Kota..">
                    <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                    @foreach($cities as $city)
                        <option value="{{ $city['city_id'] }}">{{ $city['type'] . ' ' .$city['city_name'] . ', ' .$city['province'] }}</option>
                    @endforeach
                </select>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="">Berat (kg)</label>
                <input type="number" name="weight" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <select name="courier" id="" class="form-control">
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="pos">POS</option>
                </select>
            </div>
        </div>
    </div>


    <div class="form-group">
        <button type="submit" class="btn bg-primary text-white col-md-3 float-right mb-10">Cek</button>
    </div>
</form>





