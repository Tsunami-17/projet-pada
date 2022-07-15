<h5>Nom voirie</h5>
      <p></p>
<form>
    @csrf
    <div class="form-group">
        <label>Commune</label>
        <select name="commune" class="form-control select2" style="width: 100%;">
            <option selected="selected">Tous</option>
            @foreach ($Toponymes as $Toponyme)                                            
                <option>{{ $Toponyme->commune }}</option>
            @endforeach
        </select>
    </div>
</form>
<form>
    @csrf
    <div class="form-group">
        <label>Trier par:</label>
        <select name="typologie" class="form-control select2" style="width: 100%;">
            <option selected="selected">Tous</option>
            @foreach ($Tries as $Trie)
                <option>{{ $Trie->typologie }}</option>
            @endforeach
        </select>
    </div>

</form>
