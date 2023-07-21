<x-admin.layout>
    <x-admin.content>
        <div class="box">
            <div class="title">Overview</div>
            <x-splade-form :action="route('admin.manage.admins.index')">
                <x-splade-input id="date" name="time" placeholder="Time" date />
            </x-splade-form>
        </div>
        <div class="overview">
            <div class="box">
                <div class="title">Total Patients <i class="fa-solid fa-user"></i></div>
                <div class="row">
                    <div class="total">{{count($users)}}</div>
                    <div class="somthing">off</div>
                </div>
            </div>
            <div class="box">
                <div class="title">Total Doctors <i class="fa-solid fa-user-doctor"></i></div>
                <div class="row">
                    <div class="total">{{count($doctors)}}</div>
                    <div class="somthing">off</div>
                </div>
            </div>
            <div class="box">
                <div class="title">Total Admins <i class="fa-solid fa-wrench"></i></div>
                <div class="row">
                    <div class="total">{{count($admins)}}</div>
                    <div class="somthing">off</div>
                </div>
            </div>
        </div>
        <div class="charts">
            <canvas id="myChart"></canvas>
        </div>
    </x-admin.content>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              borderWidth: 1
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>

</x-admin.layout>
