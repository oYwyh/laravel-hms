<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'

// import interactionPlugin from '@fullcalendar/interaction'


export default {
props: ['doctor','date'],
components: {
    FullCalendar // make the <FullCalendar> tag available
},
data() {
    return {
    calendarOptions: {
        plugins: [ dayGridPlugin , timeGridPlugin],
        initialView: 'timeGridWeek',
        headerToolbar: {
            left: 'prev,next',
            center: 'title',
            right: 'timeGridWeek,timeGridDay' // user can switch between the two
        },
        events: [
        ],
    }
    }
},mounted() {
    this.getDoctorsFromDatabase();
},
methods: {
    getDoctorsFromDatabase() {
        const dateArr = this.date.split(',');
        const nameArr = this.doctor.split(',');
        for (let i = 0; i < dateArr.length; i++) {
            this.calendarOptions.events.push({
                date: dateArr[i],
                title: 'operation',
            });
        }
        // setTimeout(() => {
        //     this.calendarOptions.events.forEach(lol  => {
        //         if(lol.title == 'operation') {
        //                 console.log(document.querySelectorAll('.fc-event'))
        //                 document.querySelectorAll('.fc-event').forEach(fc => {
        //                     fc.style.backgroundColor = '#fff5d8'
        //                     fc.style.borderColor = '#ffc400'
        //                     fc.style.boxShadow= '#ffc40051 0px 5px 20px 0px'
        //                 });
        //         }
        //     });
        // }, 500);
    },
}
}

</script>
<template>
<FullCalendar :options="calendarOptions" />
</template>
