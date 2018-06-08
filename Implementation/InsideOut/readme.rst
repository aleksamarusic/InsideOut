
**********
HOW TO USE
**********
Za koriscenje bi trebalo da je dovoljno samo da se podesi u config/database.php kredencijali(username, password) vaseg MySQL servera i trebalo bi da radi.

************
WHAT IS DONE
************
Resene su funkcionalnosti 1.,4.,20.,23., jer mi je tako bilo najpotrebnije i najlogicnije da bih testirao da sve radi.


                                                                          
1. Pregled glavne sranice sajta                         |Nikola |DONE   |      
2. Kreiranje naloga Direktora                           |Stefan |DONE   |
3. Kreiranje naloga Radnika                             |Stefan |DONE   |
4. Autorizacija korisnika                               |Nikola |DONE   | 
5. Resetovanje lozinke                                  |Aleksa |DONE   |
6. Radnik - Kreiranje privatnog zadatka                 |Stefan |DONE   |
7. Radnik - Brisanje privatnog zadatka                  |Stefan |DONE   |
8. Radnik - Prihvaranja ili odbijanje zadatog zadatka   |Aleksa |DONE   |
9. Radnik - Ažuriranje svojih zadataka                  |Aleksa |DONE   |
10. Radnik - Pristup stranici svog tima                 |Aleksa |       | odradjen pregled tima za direktora       
11. Radnik - Pregled stranice drugog Radnika            |Aleksa |       | 
12. Menadžer - Kreiranje Zadatog zadatka                |Stefan |DONE   |
13. Menadžer - Brisanje Zadatog zadatka                 |Stefan |DONE   |
14. Direktor - Kreiranje tima                           |Marija |DONE   |
15. Direktor - Brisanje tima                            |Marija |DONE   |
16. Direktor - Podela radnika u timove                  |Nikola |DONE   |
17. Direktor - Promena statusa zaposlenog               |Nikola |DONE   |
18. Direktor - Podela Menadžera u timove                |Nikola |DONE   |
19. Direktor - Kreiranje Zadatog zadatka                |Marija |       |
20. Direktor - Generisanje novog prijavnog linka        |Nikola |DONE   | napraviti da bude 100% jedinstven
21. Direktor - Resetovanje naloga unutar firme          |Marija |DONE   | 
22. Direktor - Promena broja naloga firme               |Marija |DONE   |
23. Administrator - Uklanjanje firme                    |Nikola |DONE   | 



*****
PLANS
*****
Ja i Marija nastavljamo odozdo direktora, vi(Aleksa, Stefan) krecite polako odozgo zagrevanje Gosta sta je ostalo, pa na Radnika/Menadzera.

Pored funkcionalnosti sredjen je i framework(prilagodjen aplikaciji), kao i dodate odgovarajuce klase i metode u njima koje cete i vi koristiti, i nadam
se da sve radi dobro, i da je i vama olaksano, ako nesto nije jasno, pitajte.
	
Hint: Novi Bunar firma FTW! (podaci kao i baza su u inside_out.sql, koji je u folderu gde i gledate ovaj readme)

*****
TODO:
*****

	- srediti za datume pri kreiranju taska
	- srediti edit task (npr. "Input is required" ne treba da postoji, prebacivanje iz In Progress u Done ili iz Done u bilo sta drugo prikazuje stranicu sa nizom)
	- dodati statistiku za direktora
	- proveriti za svaki generisani link da li je 100% jedinstven