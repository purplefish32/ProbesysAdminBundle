/**
 * Displays a form to create a new {{ entity }} entity.
 *
 * @Route("/new", name="{{ route_name_prefix }}_new")
 * @Template()
 */
public function newAction()
{
    $entity = new {{ entity_class }}();
    $form   = $this->createForm(new {{ entity_class }}Type(), $entity);

    return array(
        'entity' => $entity,
        'form'   => $form->createView()
    );
}
