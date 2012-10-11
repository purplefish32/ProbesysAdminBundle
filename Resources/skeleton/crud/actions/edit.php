/**
 * Displays a form to edit an existing {{ entity }} entity.
 *
 * @Route("/{id}/edit", name="{{ route_name_prefix }}_edit")
 * @Template()
 */
public function editAction($id)
{
    $em = $this->getDoctrine()->getEntityManager();

    $entity = $em->getRepository('{{ bundle }}:{{ entity }}')->find($id);

    if (!$entity) {
        throw $this->createNotFoundException('Unable to find {{ entity }} entity.');
    }

    $editForm = $this->createForm(new {{ entity_class }}Type(), $entity);

    return array(
        'entity'    => $entity,
        'edit_form' => $editForm->createView(),
    );
}
