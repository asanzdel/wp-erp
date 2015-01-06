<div class="erp-employee-form">

    <fieldset class="no-border">
        <ol class="form-fields">
            <li>
                <?php erp_html_form_label( __( 'Employee Photo', 'wp-erp' ), 'full-name' ); ?>

                <div class="photo-container">
                    <input type="hidden" name="photo_id" id="emp-photo-id" value="{{ data.avatar.id }}">

                    <# if ( data.avatar.id ) { #>
                        <img src="{{ data.avatar.url }}" alt="" />
                        <a href="#" class="erp-remove-photo">&times;</a>
                    <# } else { #>
                        <a href="#" id="erp-set-emp-photo" class="button button-small"><?php _e( 'Upload Employee Photo', 'wp-erp' ); ?></a>
                    <# } #>
                </div>
            </li>

            <li class="full-width name-container clearfix">
                <?php erp_html_form_label( __( 'Full Name', 'wp-erp' ), 'full-name', true ); ?>

                <ol class="fields-inline">
                    <li>
                        <?php erp_html_form_input( array(
                            'label'       => __( 'First Name', 'wp-erp' ),
                            'name'        => 'name[first_name]',
                            'id'          => 'first_name',
                            'value'       => '{{ data.name.first_name }}',
                            'required'    => true,
                            'custom_attr' => array( 'maxlength' => 30 )
                        ) ); ?>
                    </li>
                    <li class="middle-name">
                        <?php erp_html_form_input( array(
                            'label'       => __( 'Middle Name', 'wp-erp' ),
                            'name'        => 'name[middle_name]',
                            'id'          => 'middle_name',
                            'value'       => '{{ data.name.middle_name }}',
                            'custom_attr' => array( 'maxlength' => 30 )
                        ) ); ?>
                    </li>
                    <li>
                        <?php erp_html_form_input( array(
                            'label'       => __( 'Last Name', 'wp-erp' ),
                            'name'        => 'name[last_name]',
                            'id'          => 'last_name',
                            'value'       => '{{ data.name.last_name }}',
                            'required'    => true,
                            'custom_attr' => array( 'maxlength' => 30 )
                        ) ); ?>
                    </li>
                </ol>
            </li>
        </ol>

        <ol class="form-fields two-col">
            <li>
                <?php erp_html_form_input( array(
                    'label' => __( 'Employee ID', 'wp-erp' ),
                    'name'  => 'employee_id',
                    'value' => '{{ data.employee_id }}'
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'    => __( 'Email', 'wp-erp' ),
                    'name'     => 'user_email',
                    'value'    => '{{ data.user_email }}',
                    'required' => true,
                    'type'     => 'email'
                ) ); ?>
            </li>
        </ol>
    </fieldset>

    <fieldset>
        <legend><?php _e( 'Work', 'wp-erp' ) ?></legend>

        <ol class="form-fields two-col">
            <li data-selected="{{ data.work.department }}">
                <?php erp_html_form_input( array(
                    'label'   => __( 'Department', 'wp-erp' ),
                    'name'    => 'work[department]',
                    'value'   => '',
                    'type'    => 'select',
                    'options' => erp_hr_get_departments_dropdown_raw( erp_get_current_company_id() )
                ) ); ?>
            </li>

            <li data-selected="{{ data.work.designation }}">
                <?php erp_html_form_input( array(
                    'label'   => __( 'Job Title', 'wp-erp' ),
                    'name'    => 'work[designation]',
                    'value'   => '{{ data.work.designation }}',
                    'type'    => 'select',
                    'options' => erp_hr_get_designation_dropdown_raw( erp_get_current_company_id() )
                ) ); ?>
            </li>

            <li data-selected="{{ data.work.reporting_to }}">
                <?php erp_html_form_input( array(
                    'label'   => __( 'Reporting To', 'wp-erp' ),
                    'name'    => 'work[reporting_to]',
                    'value'   => '{{ data.work.reporting_to }}',
                    'type'    => 'select',
                    'id'      => 'work_reporting_to',
                    'options' => erp_hr_get_employees_dropdown_raw( erp_get_current_company_id() )
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Joining Date', 'wp-erp' ),
                    'name'    => 'work[joined]',
                    'value'   => '{{ data.work.joined }}',
                    'type'    => 'text',
                    'class'   => 'erp-date-field'
                ) ); ?>
            </li>

            <li data-selected="{{ data.work.hiring_source }}">
                <?php erp_html_form_input( array(
                    'label'   => __( 'Source of Hire', 'wp-erp' ),
                    'name'    => 'work[hiring_source]',
                    'value'   => '{{ data.work.hiring_source }}',
                    'type'    => 'select',
                    'options' => array_merge( array( 0 => __( '- Select -', 'wp-erp' ) ), erp_hr_get_employee_sources() )
                ) ); ?>
            </li>

            <li data-selected="{{ data.work.status }}">
                <?php erp_html_form_input( array(
                    'label'   => __( 'Employee Status', 'wp-erp' ),
                    'name'    => 'work[status]',
                    'value'   => '{{ data.work.status }}',
                    'type'    => 'select',
                    'options' => array_merge( array( 0 => __( '- Select -', 'wp-erp' ) ), erp_hr_get_employee_statuses() )
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Work Phone', 'wp-erp' ),
                    'name'    => 'work[phone]',
                    'value'   => '{{ data.work.phone }}'
                ) ); ?>
            </li>

            <li data-selected="{{ data.work.type }}">
                <?php erp_html_form_input( array(
                    'label'   => __( 'Employee Type', 'wp-erp' ),
                    'name'    => 'work[type]',
                    'value'   => '{{ data.work.type }}',
                    'type'    => 'select',
                    'options' => array_merge( array( 0 => __( '- Select -', 'wp-erp' ) ), erp_hr_get_employee_types() )
                ) ); ?>
            </li>
        </ol>
    </fieldset>

    <fieldset>
        <legend><?php _e( 'Personal Details', 'wp-erp' ) ?></legend>

        <ol class="form-fields two-col">
            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Mobile', 'wp-erp' ),
                    'name'    => 'personal[mobile]',
                    'value'   => '{{ data.personal.mobile }}'
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Phone', 'wp-erp' ),
                    'name'    => 'personal[phone]',
                    'value'   => '{{ data.personal.phone }}'
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Other Email', 'wp-erp' ),
                    'name'    => 'personal[other_email]',
                    'value'   => '{{ data.personal.other_email }}',
                    'type'    => 'email'
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Date of Birth', 'wp-erp' ),
                    'name'    => 'personal[dob]',
                    'value'   => '{{ data.personal.dob }}',
                    'class'   => 'erp-date-field'
                ) ); ?>
            </li>

            <li data-selected="{{ data.personal.nationality }}">
                <?php erp_html_form_input( array(
                    'label'   => __( 'Nationality', 'wp-erp' ),
                    'name'    => 'personal[nationality]',
                    'value'   => '{{ data.personal.nationality }}',
                    'type'    => 'select',
                    'options' => \WeDevs\ERP\Countries::instance()->get_countries()
                ) ); ?>
            </li>

            <li data-selected="{{ data.personal.gender }}">
                <?php erp_html_form_input( array(
                    'label'   => __( 'Gender', 'wp-erp' ),
                    'name'    => 'personal[gender]',
                    'value'   => '{{ data.personal.gender }}',
                    'type'    => 'select',
                    'options' => erp_hr_get_genders()
                ) ); ?>
            </li>

            <li data-selected="{{ data.personal.marital_status }}">
                <?php erp_html_form_input( array(
                    'label'   => __( 'Marital Status', 'wp-erp' ),
                    'name'    => 'personal[marital_status]',
                    'value'   => '{{ data.personal.marital_status }}',
                    'type'    => 'select',
                    'options' => erp_hr_get_marital_statuses()
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Driving License', 'wp-erp' ),
                    'name'    => 'personal[driving_license]',
                    'value'   => '{{ data.personal.driving_license }}'
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Hobbies', 'wp-erp' ),
                    'name'    => 'personal[hobbies]',
                    'value'   => '{{ data.personal.hobbies }}'
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Website', 'wp-erp' ),
                    'name'    => 'personal[user_url]',
                    'value'   => '{{ data.personal.user_url }}',
                    'type'    => 'url'
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Address', 'wp-erp' ),
                    'name'    => 'personal[address]',
                    'value'   => '{{ data.personal.address }}',
                    'type'    => 'textarea'
                ) ); ?>
            </li>

            <li>
                <?php erp_html_form_input( array(
                    'label'   => __( 'Biography', 'wp-erp' ),
                    'name'    => 'personal[description]',
                    'value'   => '{{ data.personal.description }}',
                    'type'    => 'textarea'
                ) ); ?>
            </li>

        </ol>
    </fieldset>

    <input type="hidden" name="user_id" id="erp-employee-id" value="{{ data.id }}">
    <input type="hidden" name="action" id="erp-employee-action" value="erp-hr-employee-new">
    <?php wp_nonce_field( 'wp-erp-hr-employee-nonce' ); ?>
    <?php do_action( 'erp_hr_employee_form' ); ?>
</div>