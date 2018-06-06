# backToFuture Quest

# Critéres de validation

- La classe s'appelle TimeTravel et prend bien 2 paramètres DateTime à l'instanciation.
- La méthode getTravelInfo() renvoie bien une phrase décrivant la différence de temps (de l'année à la seconde) entre les deux propriétés $start et $end.
- La méthode findDate() renvoie bien une date d'arrivée qui est $interval secondes avant la $date de départ. Pour une date de départ au 31/12/1985, le résultat renvoie une réponse autour de 1954.
- Optionnel : La méthode findDate() fonctionne avec n'importe quel intervalle, positif ou négatif, donc pour un voyage dans le passé ou dans le futur.
- La méthode backToFutureStepByStep renvoie un tableau de N objets Date formatés selon les besoins du convecteur temporel, c'est-à-dire 'Jan 22 1984 AM 06:35'
- La méthode backToFutureStepByStep utilise l'objet DatePeriod()

