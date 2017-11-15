<h3><a href="?class=Objets&value=account"><span class="object">Objet</span> CardModel</a></h3>
<h4>Attributs</h4> 
<ul class ="attributs">
	<li><span class="static">static</span> cm_instance</li>
</ul>

<h4>Fonctions</h4>
	<ul>
		<li><span>public <span class="static">static</span></span> getInstance()</li>
		<li><span>public</span> add(<a href="?class=Objets&value=Library" class="objectref">Library</a> $data,
									<a href="?class=Objets&value=Account" class="objectref">Account </a><span class="attr">id</span> $a_id, 
									<a href="?class=Objets&value=Deck" class="objectref">Deck </a><span class="attr">id</span> $d_id)</li>
		<li><span>public</span> update(<a href="?class=Objets&value=Card" class="objectref">Card</a> $card)</li>
		<li><span>public</span> delete(<a href="?class=Objets&value=Card" class="objectref">Card</a> <span class="attr">id</span> $c_id)</li>
		<li><span>public</span> get(<a href="?class=Objets&value=Card" class="objectref">Card</a> <span class="attr">id</span> $c_id)</li>
		<li><span>public</span> getByDeck(<a href="?class=Objets&value=Deck" class="objectref">Deck</a> <span class="attr">id</span> $d_id)</li>
		<li><span>public</span> attack(<a href="?class=Objets&value=Card" class="objectref">Card</a> $attaquant,
									   <a href="?class=Objets&value=Card" class="objectref">Card</a> $target,
									   <a href="?class=Models&value=LM" class="objectref">LibraryModel</a> $lm)</li>
	</ul>