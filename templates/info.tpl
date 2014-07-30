<div itemscope itemtype="http://schema.org/Drug" id="info">
<meta itemprop="code" content="{$id}" />
<h3 class="infosearch" itemprop="name">{$name}</h3>
{if isset($conditions)}
    <img class="bigpicto" src="img/x.png" alt="" />
    <div itemprop="prescriptionStatus">
        <p><strong class="no">Ne réutilisez pas ce médicament sans prescription médicale !</strong></p>
        <div class="reasons">
        <b>L'usage et la vente de ce médicament sont réglementés</b>, pour les raisons suivantes&nbsp;:
        <ul>
        {foreach from=$conditions item=condition}
        <li>{$condition}</li>
        {/foreach}
        </ul>
        </div>
    </div>
    <div class="moreinfo">S'il vous reste des doses non-utilisées, vous pouvez ramener ce médicament à votre pharmacien.</div>
{else}
    <img class="bigpicto" src="img/y.png" alt="" />
    <div itemprop="prescriptionStatus">
        <span class="yes">Vous pouvez réutiliser ce médicament, à condition de respecter les consignes suivantes&nbsp;:</span>
        <div class="reasons">
        <ul>
            <li>Lisez attentivement <a itemprop="prescribingInfo" target="_blank" title="Notice de {$name}" href="http://base-donnees-publique.medicaments.gouv.fr/affichageDoc.php?specid={$id}&amp;typedoc=N"><b>la notice</b></a> ;</li>
            <li>Vérifiez la <b>date de péremption</b> ;</li>
            <li>En cas de doute, demandez à votre pharmacien ou votre médecin.</li>
        </ul>
        </div>
    </div>
    <div class="moreinfo">Si ce médicament est périmé, vous pouvez le ramener à votre pharmacien.</div>
{/if}
</div>
