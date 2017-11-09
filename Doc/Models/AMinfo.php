<h3><a href="?class=Objets&value=account"><span class="object">Objet</span> AccountModel</a></h3>
<h4>Attributs</h4> 
<ul class ="attributs">
	<li><span class="static">static</span> am_instance</li>
	<li>dm - <i>Représente un DeckModel</i></li>
	<li>lm - <i>Représente un LibraryModel</i> </li>
	<li>cm - <i>Représente un CardModel</i></li>
</ul>

<h4>Fonctions</h4>
	<ul>
		<li><span>public <span class="static">static</span></span> getInstance()</li>
		<li><span>public</span> getDeckModel()</li>
		<li><span>public</span> add(array $data)</li>
		<li><span>private</span> generateDeck($account_id)</li>
		<li><span>public</span> update($a_email, array $data) - <b style="color:red;">Fonction à retravailler !!</b></li>
		<li><span>public</span> delete($id)</li>
		<li><span>public</span> getByName($username)</li>
		<li><span>public</span> getAll</li>
	</ul>