<x-admin.layout>
    <x-admin.content>
        <div class="profile">
            <div class="title">Manage Profile</div>
            <div class="wrapper">
                <x-splade-toggle>
                        <x-splade-transition show="!toggled">
                            <x-splade-form :default="$admin"  method="POST" class="info">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{Auth::user()->image ? asset('storage/'.Auth::user()->image) : asset('images/doc.jpg')}}" alt="">
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="group">
                                        <x-splade-input type="text" class="input" name="name" label="Name" disabled/>
                                        <x-splade-input type="text" class="input" name="email" label="Email" disabled/>
                                    </div>
                                    <div class="group">
                                        <x-splade-input type="text" class="input" name="phone" label="Phone" disabled/>
                                    </div>
                                </div>
                            </x-splade-form>
                        </x-splade-transition>
                        <x-splade-transition show="toggled">
                            <x-splade-form  :action="route('admin.profile.update')" :default="$admin" show="!toggled" class="info" enctype="multipart/form-data">
                                <div class="box">
                                    <div class="img-box">
                                        <img src="{{Auth::user()->image ? asset('storage/'.Auth::user()->image) : asset('images/doc.jpg')}}" alt="">
                                    </div>
                                    <x-splade-file name="image" />
                                </div>
                                <div class="column">
                                    <div class="group">
                                        <x-splade-input type="text" class="input" name="name" label="Name" />
                                        <x-splade-input type="text" class="input" name="email" label="Email" />
                                    </div>
                                    <div class="group">
                                        <x-splade-input type="text" class="input" name="phone" label="Phone" />
                                        <x-splade-input type="password" class="input" name="password" label="password" />                                    </div>
                                    <x-splade-submit class="mt-4" style="width:100%;" label="update" />
                                </div>
                            </x-splade-form>
                        </x-splade-transition>
                    <button class="edit" v-show="!toggled" @click.prevent="toggle">Edit</button>
                </x-splade-toggle>
            </div>
        </div>
    </x-admin.content>

    <x-splade-script show="toggled">

            {{-- var inputs = document.querySelector( '.file' );
            var label	 = input.nextElementSibling,
                labelVal = label.innerHTML;


            {{-- input.addEventListener( 'change', function( e )
            {
                var fileName = '';
                if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
                else
                    fileName = e.target.value.split( '\' ).pop();

                if( fileName )
                    label.querySelector( 'span' ).innerHTML = fileName;
                    else
                    label.innerHTML = labelVal;
                }); --}}
        </x-splade-script>
    </x-admin.layout>
