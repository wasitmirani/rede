<div>
    {{-- Success is as dangerous as failure. --}}

    <form id="msform" data-aos="fade-right">
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
            @error('first_name')
             <span class="error text-danger">{{ $message }}</span>
             @enderror
            <input type="text"  placeholder="Last Name" wire:model="last_name" required/>
            @error('last_name')
            <span class="error text-danger">{{ $message }}</span>
            @enderror
            <input type="text"  placeholder="Phone" wire:model="phone_number" required/>
            {{-- <span>{{$this->errors('phone_number')}} - message</span> --}}

             @error('phone_number')
             <span class="error text-danger">{{ $message }}</span>
             @else
             <input type="button" name="next" class="next action-button btn btn-business" value="Next"/>
             @enderror

        </fieldset>
        <fieldset>
            <p class="text-left">First, we need some basic account information. But don't worry - you can always change your settings later.</p>
            <input type="text" name="twitter" placeholder="Twitter"/>
            <input type="text" name="facebook" placeholder="Facebook"/>
            <input type="text" name="gplus" placeholder="Google Plus"/>
            <input type="button" name="previous" class="previous action-button-previous btn btn-business" value="Previous"/>
            <input type="button" name="next" class="next action-button btn btn-business" value="Next"/>
        </fieldset>
        <fieldset>
            <p class="text-left">First, we need some basic account information. But don't worry - you can always change your settings later.</p>
            <input type="text" name="text" placeholder="Username"/>
            <input type="password" name="password" placeholder="Password"/>
            <input type="text" name="text" placeholder="First Name and Last Initial"/>
            <input type="tel" name="zip" placeholder="Zip Code"/>
            <input type="button" name="previous" class="previous action-button-previous btn btn-business" value="Previous"/>
            <input type="submit" name="submit" class="submit action-button btn btn-business" value="Submit"/>
        </fieldset>
    </form>

</div>
