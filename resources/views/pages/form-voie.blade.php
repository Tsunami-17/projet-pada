@if (session()->has('success'))
    <div class="alert alert-success" role="alert">{{ session('success') }}</div>
@endif
    <form method="POST" action="" accept-charset="UTF-8" class="brand-text">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="commune_name" class="text-light">{{ __('Commune') }}</label>
                <select id="commune" name="commune" class="form-control select2 elevation-4 dynamic" data-dependent="typologie" style="width: 100%;">
                    <option value="TOUS" >{{ __('TOUS') }}</option>
                    <!-- On parcourt la collection de Toponymes pour afficher chaque commune -->
                    @foreach ($commune_list as $commune)
                        <option value="{{ $commune->commune }}" >{{ $commune->commune }}</option>
                    @endforeach
                </select>
        </div>
        {{-- @if($typologies->count()) --}}

            <div class="form-group">
                <label for="typologie_name" class="text-light">{{ __('Trier par:') }}</label>
                <select id="typologie" name="typologie" class="form-control select2 elevation-4 dynamictypo" data-dependent="nom_propose" style="width: 100%;">
                    <option value="TOUS" selected="selected">{{ __('TOUS') }}</option>
                    <!-- On parcourt la collection de Toponymes pour afficher chaque typologie -->


                </select>
            </div>
            {{-- @if($nom_proposes->count()) --}}
                <div class="form-group">
                    <label class="text-light">{{ __('Nom proposer') }}</label>
                    <select multiple name="nom_propose" id="nom_propose" class="custom-select elevation-4 description" size="13">

                    </select>
                </div>
                <div class="form-group">
                    <button type="button" onclick=""
                    class="btn btn-block btn-success btn-lg elevation-4">
                        {{ __('Nommer') }}
                    </button>
                </div>

            {{-- @endif --}}
    </form>
        {{-- @endif --}}

