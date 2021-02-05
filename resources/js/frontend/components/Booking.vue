<template>
    <div class="card">
        <img :src="booking.showing.film.image_url" class="card-img-top"
             :alt="booking.showing.film.name">
        <div class="card-body">
            <h5 class="card-title">{{ booking.showing.film.name }}</h5>
            <p class="card-text">{{ booking.showing.film.description }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Cinema: {{ booking.showing.theatre.cinema.name }}
                @ {{ booking.showing.theatre.cinema.location }}
            </li>
            <li class="list-group-item">Showing at: <br> {{
                    booking.showing.showing_at | moment("dddd, D MMMM YYYY @ HH:mm:ss")
                }} ({{ booking.showing.showing_at | moment("from", "now") }})
            </li>
        </ul>
        <div class="card-body">
            <button class="btn btn-danger" type="button" @click="deleteBooking">DELETE BOOKING</button>
        </div>
        <div class="card-footer">
            Reference: {{ booking.reference }}
        </div>
    </div>
</template>

<script>
export default {
    name: 'Booking',
    props: ['booking', 'user'],
    data: function () {
        return {
        }
    },
    methods: {
        deleteBooking: function() {
            axios.post('/api/booking/delete', {
                reference: this.booking.reference
            }).then((response) => {
                Swal.fire(
                    'Tickets Cancelled!',
                    'ticket ' + this.booking.reference + ' has been cancelled!',
                    'success'
                ).then((response) => {
                    location.reload();
                })
            }).catch(response => {
                Swal.fire({
                    icon: 'error',
                    title: 'Something went wrong.',
                    text: response.response.data
                })
            })
        }
    }
}
</script>
