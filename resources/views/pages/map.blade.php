<div class="row">
    <div class="col-md-3">
        <div class="card card-primary card-outline elevation-2">
            <div class=" form-group text-center">
                <label for="commune_name" class="text-dark">{{ __('Commune') }}
                <select id="commune" name="commune" class="custom-select elevation-2 dynamic typevoie" data-dependent="typologie">
                    <option value="">{{ __('TOUS') }}</option>
                    <!-- On parcourt la collection de Toponymes pour afficher chaque commune -->
                    @foreach ($commune_list as $commune)
                    <option value="{{ $commune->commune }}">{{ $commune->commune }}</option>
                    @endforeach
                </select></label>

            </div>

            <div class=" form-group text-center">
                <label class="text-dark">{{ __('type de voirie') }}
                <select name="fclass" id="fclass" class="custom-select elevation-2 fclass">
                    <option value="voirie_pada">voirie pada</option>
                    {{--<option value="voirie_primaire">voirie primaire</option>
                    <option value="voirie_secondaire">voirie secondaire</option>
                    <option value="voirie_tertiaire">voirie tertiaire</option> --}}
                </select></label>
            </div>

            <div class="form-group">
                <button class="btn btn-block btn-primary elevation-2 search voie" data-dependent="voie">
                    {{ __('Chercher') }}
                </button>
            </div>

            <div class="form-group text-center">
                <label class="text-dark">{{ __('Liste des voirie') }}</label>
                <select multiple name="voie" id="voie" class="custom-select elevation-2" size="19">

                </select>
            </div>
        </div>
     </div>
    <div class="col-md-9">
        <div class="card  card-outline elevation-2">
            <x-maps-leaflet></x-maps-leaflet>
        </div>
    </div>
</div>
