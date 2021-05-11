<div>
    {{-- Success is as dangerous as failure. --}}

    <form id="msform" data-aos="fade-right" wire:submit.prevent="submit">
        <!-- progressbar -->
        <ul id="progressbar">
            <li class="active">Personal Details</li>
            <li>Social Profiles</li>
            <li>Account Setup</li>
        </ul>

        <!-- fieldsets -->
        <fieldset>
            <p class="text-left">First, we need some basic account information. But don't worry - you can always change your settings later.</p>
            <input type="text" placeholder="First Name" required wire:model="first_name"/>

            <input type="text"  placeholder="Last Name" wire:model="last_name" required/>

            <input type="text"  placeholder="Phone" wire:model="phone_number" required/>
            {{-- <span>{{$this->errors('phone_number')}} - message</span> --}}

        
             <input type="button" name="next" class="next action-button btn btn-business" value="Next"/>

        </fieldset>
        <fieldset>
            <p class="text-left">First, we need some basic account information. But don't worry - you can always change your settings later.</p>
            <input type="text" name="twitter" wire:model="twitter" placeholder="Twitter"/>
            <input type="text" name="facebook" wire:model="facebook" placeholder="Facebook"/>
            <input type="text" name="gplus" wire:model="google_plus" placeholder="Google Plus"/>
            <input type="button" name="previous" class="previous action-button-previous btn btn-business" value="Previous"/>
            <input type="button" name="next" class="next action-button btn btn-business" value="Next"/>
        </fieldset>
        <fieldset>
            <p class="text-left">First, we need some basic account information. But don't worry - you can always change your settings later.</p>
            <input type="text" name="text" wire:model="user_name"  placeholder="Username"/>
            <input type="password" name="password" wire:model="password"  placeholder="Password"/>
            <input type="text" name="text"  wire:model="full_name" placeholder="First Name and Last Initial"/>
            <input type="tel" name="zip" wire:model="zip"  placeholder="Zip Code"/>
            <input type="button" name="previous" class="previous action-button-previous btn btn-business" value="Previous"/>
            <input type="submit" name="submit" class="submit action-button btn btn-business" value="Submit"/>
        </fieldset>
    </form>

</div>
