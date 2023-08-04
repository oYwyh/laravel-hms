<x-doctor.layout>
    <x-doctor.content>
        <div class="title">Prescriptions</div>
        <div class="wrapper">
            <x-splade-toggle>
                <div class="toggle">
                    <ul>
                        <li >Laboratory</li>
                        <li >Radiology</li>
                        <li >Medicine</li>
                    </ul>
                </div>
                <x-splade-transition show="!toggled">
                    <div class="presc">
                        <div class="prescription">
                            @php
                                $laboratory = explode(',',Session::get('appointment')->laboratory);
                            @endphp
                            <div class="presc-txt" id="prescTxt">
                                @foreach ($laboratory as $item)
                                    {{$item}}
                                    <br>
                                @endforeach
                            </div>
                        </div>
                        <div class="editor">
                            <x-splade-form>
                                <x-splade-textarea id="editTxt" name="history" autosize label="lol"  />
                                <x-splade-submit id="editBtn" label="edit" class="mt-2" />
                            </x-splade-form>
                                <button id="saveBtn" class="mt-2">Save</button>
                        </div>
                    </div>
                </x-splade-transition>
            </x-splade-toggle>
        </div>
    </x-doctor.content>
    <x-splade-script>
        const editBtn = document.getElementById('editBtn');
        const saveBtn = document.getElementById('saveBtn');
        const editTxt = document.getElementById('editTxt');
        const prescTxt = document.getElementById('prescTxt');
        editBtn.addEventListener('click',(e) => {
            e.preventDefault();
            let textValue = editTxt.value.split('\n').join('<br>');
            prescTxt.innerHTML = textValue;
        })
        saveBtn.addEventListener('click',(e) => {
            e.preventDefault();
        })
    </x-splade-script>
</x-doctor.layout>
