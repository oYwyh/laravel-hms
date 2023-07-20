<x-admin.layout>
    <x-admin.content>
        <h1>Admins</h1>
    </x-admin.content>
    <x-splade-script>
        const droppbtn = document.getElementById('droppbtn');
        const dropbbtn = document.getElementById('dropbbtn');

        const droppcontent = document.getElementById('dropdown-profile-content')
        const dropbcontent = document.getElementById('dropdown-bell-content')


        droppbtn.addEventListener('click', () => {
            droppcontent.classList.toggle('show')
        })
        dropbbtn.addEventListener('click', () => {
            dropbcontent.classList.toggle('show')
        })
    </x-splade-script>
</x-admin.layout>
