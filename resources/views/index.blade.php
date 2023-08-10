<x-layout>

<section class="section container">
<div class="columns">

    <div class="column is-half">
        <h1 class="title has-text-weight-light is-size-1 has-text-left">{{ config('appconstants.app.name') }}</h1>

        <figure class="image is-1by1">
            <img src="images/hero.svg" alt="The Process Flow" on:click="{showImg}">
        </figure>
    </div>

    <div class="column content">

        <h1 class="subtitle has-text-weight-light">{{ config('appconstants.app.welcome_greeter') }}</h1>

        <p class="mb-3">{{ config('appconstants.app.welcome_explanation') }}</p>

        <p class="mb-3"></p>

        <ul>
            <li>Requirements
                <ul>
                    <li>Write requirements content</li>
                    <li>Link with MOCs and POCs</li>
                    <li>Link with products</li>
                </ul>
            </li>

            <li>Means of Compliances (MoC)

                <ul>
                    <li>List of MoCs</li>
                    <li>Define MoC</li>
                </ul>
            </li>

            <li>Proof of Compliances (PoC)
                <ul>
                    <li>List of PoCs</li>
                    <li>Define PoC</li>
                </ul>
            </li>

            <li>Products
                <ul>
                    <li>List of Products</li>
                    <li>Project Decision Gates</li>
                </ul>
            </li>

            <li>Extract

                <ul>
                    <li>Requirements List</li>
                    <li>Compliances Matrix</li>
                    <li>Requirements vs Decision Gates</li>
                    <li>Requirements vs POCs</li>
                </ul>
            </li>

        </ul>

    </div>

</div>
</section>
</x-layout>

