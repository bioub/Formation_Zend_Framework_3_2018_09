# TP Vendredi

## Routes

* Créer un contrôleur CompanyController avec 2 méthodes listAction et showAction et leur faire retourner un objet ViewModel
* L'enregistrer dans l'annuaire de contrôleurs grâce à une InvokableFactory
* Créer 2 vues show.phtml et list.phtml dans views/application/company avec du HTML statique (titre + liste pour list et titre + quelques champs pour show)
* Créer une route company et une route enfant show sur le même modèle que contact
* Tester que vos pages soient accessibles

## Model

* Créer une entité Company avec quelques champs
* Ajouter les annotations Doctrine pour décrire le mapping vers la base de données
* Compléter votre entity avec des getters/setters
* Lancer la commande doctrine pour mettre à jour la structure de la base de données
(vérifier avant la requete avec --dump-sql)
* Créer une classe CompanyService en lui injectant l'EntityManager de Doctrine
* Créer 2 méthodes getAll et getById sur le même modèle que ContactService
* Créer une factory pour CompanyService en allant chercher la clé de Doctrine dans le container
* Enregistrer la factory dans la config sous service_manager

## Controleurs + vues

* Injecter CompanyService via le constructeur de CompanyController
* Créer une factory pour CompanyController en injectant CompanyService
* Enregistrer cette nouvelle factory dans le container de controlleur (à la place de InvokableFactory)
* Appeler les méthodes du services dans list et show et passer les données aux vues
* Développer les vues avec les entités
