{if $results}
<ul>
    {foreach from=$results item=result}
        <li><a href="index.php?id={$result.id}">{$result.name}</a></li>
    {/foreach}
</ul>
{else}
    <p>Aucun résultat.</p>
{/if}
