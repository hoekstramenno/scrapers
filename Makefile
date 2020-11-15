up:
	@docker-compose up -d

down:
	@docker-compose down --remove-orphan

destroy:
	@docker-compose down --remove-orphan --volumes
