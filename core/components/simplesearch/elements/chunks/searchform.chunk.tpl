<form class="sisea-search-form" action="[[~[[+landing]]]]" method="[[+method]]">
  <fieldset>
    <label for="[[+searchIndex]]">[[%sisea.search? &namespace=`sisea` &topic=`default`]]</label>

    <input type="text" name="[[+searchIndex]]" id="[[+searchIndex]]" value="[[+searchValue]]" />
    <input type="hidden" name="id" value="[[+landing]]" /> 

    <input type="submit" value="[[%sisea.search? &namespace=`sisea` &topic=`default`]]" />
  </fieldset>
</form>
