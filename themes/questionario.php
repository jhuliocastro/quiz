<?php $this->layout('_themes', ["title" => 'Questionário']); ?>
<div class="container-fluid">
    <div class="card">
        <h5 class="card-header">Questionários</h5>
        <br/>
        <div class="container-fluid">
            <div id = "accordion-2">
                <h3>Tab 1</h3>
                <div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <h3>Tab 2</h3>
                <div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <h3>Tab 3</h3>
                <div>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                    <ul>
                        <li>List item one</li>
                        <li>List item two</li>
                        <li>List item three</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->start('scripts'); ?>
<script>
    $(function() {
        $( "#accordion-2" ).accordion({
            collapsible: true
        });
    });
</script>
<?php $this->end(); ?>