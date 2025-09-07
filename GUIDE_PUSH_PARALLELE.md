# Pousser en parallèle vers deux dépôts Git

Ce guide explique comment configurer votre dépôt local pour pousser simultanément vers deux dépôts GitHub (push multi-URL), puis comment vérifier et utiliser cette configuration.

## Prérequis
- Un dépôt local Git déjà initialisé et configuré avec `origin`.
- Droits de push sur les deux dépôts distants.

Exemple utilisé ici:
- Dépôt principal: `https://github.com/elassir/Poo_Project.git`
- Dépôt secondaire: `https://github.com/elassir/sous-groupe2.git`
- Branche: `main`

## 1) Vérifier les remotes et la branche active
```powershell
cd "c:\Users\moi\Documents\GitHub\Poo_Project"
git remote -v
git branch --show-current
```

## 2) (Optionnel) Vérifier l’accessibilité du dépôt secondaire
```powershell
git ls-remote https://github.com/elassir/sous-groupe2.git
```

## 3) Ajouter l’URL du dépôt secondaire comme 2e URL de push
```powershell
git remote set-url --add --push origin https://github.com/elassir/sous-groupe2.git
```

## 4) S’assurer que l’URL de push du dépôt principal est bien présente
```powershell
git remote set-url --add --push origin https://github.com/elassir/Poo_Project.git
```

## 5) Vérifier la configuration des URLs de push
```powershell
git remote get-url --push --all origin
# et/ou
git remote -v
```
Vous devez voir deux lignes `(push)` pour `origin`:
- `https://github.com/elassir/sous-groupe2.git`
- `https://github.com/elassir/Poo_Project.git`

## 6) Tester avec un push à blanc (dry-run)
```powershell
git push --dry-run origin main
```

## 7) Pousser effectivement la branche vers les deux dépôts
```powershell
git push origin main
```
Ce `git push` enverra les commits vers les deux dépôts configurés sur `origin`.

## 8) (Optionnel) Pousser toutes les branches et les tags
```powershell
git push --all origin
git push --tags origin
```

## Commandes utiles de maintenance
- Supprimer une URL de push spécifique:
```powershell
git remote set-url --push --delete origin https://github.com/elassir/sous-groupe2.git
```
- Voir la configuration Git liée aux remotes/push:
```powershell
git config --get-all remote.origin.pushurl
```

## Notes et dépannage
- Si l’historique du dépôt secondaire diverge (commits différents), Git peut refuser le push. Inspectez les différences avant toute action forcée.
- Évitez `--force` à moins d’être certain des impacts.
- `git push --mirror origin` remplace toutes les refs (branches/tags) sur les dépôts de push; dangereux si les dépôts ne doivent pas être strictement identiques.
- Les commandes ci-dessus sont données pour PowerShell (Windows). Elles fonctionnent aussi dans d’autres shells.

## Utilisation quotidienne
- Après configuration, continuez d’utiliser simplement:
```powershell
git push origin main
```
Chaque exécution poussera vos changements sur les deux dépôts en parallèle.
