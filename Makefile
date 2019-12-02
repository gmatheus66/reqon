server:
	cp .env.example .env
	composer install
	php artisan key:generate
	npm install
	nano .env
	php artisan migrate:fresh --seed
	php artisan serve

conf-git-reni:
	git config --global user.name "renissonsilva"
	git config --global user.email "renissonx@gmail.com"

conf-git-pedro:
	git config --global user.name "pphenriquesm"
	git config --global user.email "pphenriue543@gmail.com"

conf-git-gui:
	git config --global user.name "GuiLira"
	git config --global user.email "liraguilherme252@gmail.com"

conf-git-math:
	git config --global user.name "gmatheus66"
	git config --global user.email "gmatheus66@hotmail.com"

conf-git-aline:
	git config --global user.name "alinevenceslau"
	git config --global user.email "alineepecris79@gmail.com"

conf-git-leo:
	git config --global user.name "leonardolfp"
	git config --global user.email "leonardolfp15@gmail.com"

conf-git-juciele:
	git config --global user.name "jucielefernandes"
	git config --global user.email "juciele.bol@gmail.com"

conf-git-morgana:
	git config --global user.name "k0rgana"
	git config --global user.email "anagrom1999@gmail.com"

