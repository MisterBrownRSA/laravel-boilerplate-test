<template>
    <div class="card">
        <img :src="showing.film.image_url" class="card-img-top"
             :alt="showing.film.name">
        <div class="card-body">
            <h5 class="card-title">{{ showing.film.name }}</h5>
            <p class="card-text">{{ showing.film.description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cinema: {{ showing.theatre.cinema.name }}
                @ {{ showing.theatre.cinema.location }}
            </li>
            <li class="list-group-item">Showing at: <br> {{ showing.showing_at | moment("dddd, D MMMM YYYY @ HH:mm:ss") }} ({{ showing.showing_at | moment("from", "now") }})
            </li>
        </ul>
        <div class="card-body" v-if="auth">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="How many tickets"
                       aria-label="Amount" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="button-addon2">BOOK NOW</button>
                </div>
            </div>
        </div>
        <div class="card-footer">
            Pay R{{ showing.film.price }} per ticket ({{ showing.available_seats }} available)
        </div>
    </div>
</template>

<script>
export default {
    name: 'Showing',
    props: ['showing', 'auth']
}
</script>
