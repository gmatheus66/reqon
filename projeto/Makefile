runserver:
	sudo apt-get install php7.2 php7.2-mbstring php7.2-mysql php7.2-intl php7.2-xml composer
	composer install --no-scripts
	cp .env.example .env
	php artisan key:generate
	php artisan serve

conf-git-reni:
	git config --global user.name "renissonsilva"
	git config --global user.email "renissonx@gmail.com"