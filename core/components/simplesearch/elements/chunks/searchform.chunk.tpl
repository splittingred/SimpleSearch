<form class="sisea-search-form" action="[[~[[+landing:default=`[[*id]]`]]]]" method="[[+method:default=`get`]]">
    <input type="hidden" name="id" value="[[+landing:default=[[*id]]]]" /> 
    <label>
        <input type="text" name="[[+searchIndex]]" value="[[+searchValue]]" />
    </label>

    <input type="submit" value="[[%sisea.search? &namespace=`sisea` &topic=`default`]]" />
</form>