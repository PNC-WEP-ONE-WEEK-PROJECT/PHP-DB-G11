
    <!-- FROM TO REGISTER ACCOUNT -->
    <form class="py-5 m-4" action="../controllers/register_account.php" method="post">
        <div class="form-title d-flex justify-content-center"><p class="text-primary">REGISTER ACCOUNT</p></div>
        <input class="w-100 fill" type="text" placeholder="Email address" name="email">
        <div class="w-100 fill-block">
            <input class="w-100 fill" name="firstName" type="text" placeholder="First name">
            <input class="w-100 fill" name="lastName" type="text" placeholder="Last name">
        </div>
        <div class="w-100 fill-block">
            <input class="w-100 fill" name="password" type="text" placeholder="Create password">
            <input class="w-100 fill" name="cfpassword" type="text" placeholder="Confirm password">
        </div>
        <div class="d-flex mt-4">
            <div class="d-flex gender">
                <input type="radio" name="gender" value="M" id="Man">
                <label for="Man">Man</label>
            </div>
            <div class="d-flex px-3 gender">
                <input type="radio" name="gender" value="F" id="Woman">
                <label for="Woman">Woman</label>
            </div>
        </div>
        <button type="submit" class="w-100 p-2 save btn-primary btn-register">REGISTER ACCOUNT</button>
    </form>
