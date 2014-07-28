<h3>{$name}</h3>
{if isset($conditions)}
    <p><strong class="no">Ne réutilisez pas ce médicament sans prescription médicale !</strong></p>
    <b>L'usage et la vente de ce médicament sont réglementés</b>, pour les raisons suivantes&nbsp;:
    <ul>
    {foreach from=$conditions item=condition}
    <li>{$condition}</li>
    {/foreach}
    </ul>
    <i>S'il vous reste des doses non-utilisées, vous pouvez ramener ce médicament à votre pharmacien.</i>
{else}
    <span class="yes">Vous pouvez réutiliser ce médicament</span>, à condition de respecter les consignes suivantes&nbsp;:
    <ul>
        <li>Lisez attentivement la <b>notice</b> ;
        <li>Vérifiez la <b>date de péremption</b> ;</li>
        <li>En cas de doute, demandez à votre pharmacien ou votre médecin.</li>
    </ul>
    <i>Si ce médicament est périmé, vous pouvez le ramener à votre pharmacien.</i>
{/if}
