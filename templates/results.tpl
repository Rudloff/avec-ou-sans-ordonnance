{if $results}
<p class="infosearch">Médicaments trouvés pour la recherche <span class="mark">{$search} ({$results|@count} résultats)</span></p>
<ul class="results">
    {foreach from=$results item=result}
        <li><a href="index.php?id={$result.id}">{$result.name}</a></li>
    {/foreach}
</ul>
{else}
    <p>Aucun résultat.</p>
{/if}
