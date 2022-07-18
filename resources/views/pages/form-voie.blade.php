
    <h5>Nom voirie</h5>
        <p></p>
        <div class="form-group">
            <label for="commune_name">Commune</label>
            <!-- L''état de chargement de données -->
            <p wire:loading >Chargement de données ...</p>
            <!-- Data Binding : <select> avec la propriété $commune_name -->
                <select id="commune_name" wire:model="commune_name" name="commune" class="form-control select2" style="width: 100%;">
                    <option value="Tous" >Tous</option>
                    <!-- On parcourt la collection de Toponymes pour afficher chaque commune -->
                    @foreach ($communes as $commune)
                        <option value="{{ $commune->commune }}" >{{ $commune->commune }}</option>
                    @endforeach
                </select>
        </div>
        @if($typologies->count())

            <div class="form-group">
                <label for="typologie_name">Trier par:</label>
                <!-- On vérifie si la collection de Typologie contient des éléments -->
                <select id="typologie_name" wire:model="typologie_name" name="typologie" class="form-control select2" style="width: 100%;">
                    <option value="Tous" selected="selected">Tous</option>
                    <!-- On parcourt la collection de Toponymes pour afficher chaque typologie -->
                    @foreach ($typologies as $typologie)
                        <option>{{ $typologie->typologie }}</option>
                    @endforeach
                </select>
            </div>
            @if($nom_proposes->count())
                <div class="form-group">
                    <label>Nom proposer</label>
                    <select multiple class="custom-select" wire:model="nom_propose_name">
                        @foreach ($nom_proposes as $nom_propose)
                            <option value="{{ $commune->commune }}">{{ $nom_propose->nom_propose }}</option>
                        @endforeach
                    </select>
                </div>
            @endif
        @endif



