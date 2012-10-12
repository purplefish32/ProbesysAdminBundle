/**
 * Edits an existing {{ entity }} entity.
 *
 * @Route("/{id}/update", name="{{ route_name_prefix }}_update")
 * @Method("post")
 * @Template("{{ bundle }}:{{ entity }}:edit.html.twig")
 */
public function updateAction($id)
{
    $em = $this->getDoctrine()->getEntityManager();

    $entity = $em->getRepository('{{ bundle }}:{{ entity }}')->find($id);

    if (!$entity) {
        throw $this->createNotFoundException('Unable to find {{ entity }} entity.');
    }

    $editForm   = $this->createForm(new {{ entity_class }}Type(), $entity);

    $request = $this->getRequest();

    $editForm->bindRequest($request);

    if ($editForm->isValid()) {
        $em->persist($entity);
        $em->flush();

        $this->get('session')->setFlash( 'success', 'Your {{ entity_class }} has been updated' );

        if ($request->get('action') == 'save_and_add') {
            return $this->redirect($this->generateUrl('{{ route_name_prefix }}_new'));
        } elseif ($request->get('action') == 'save_and_edit') {
            return $this->redirect($this->generateUrl('{{ route_name_prefix }}_edit', array('id' => $id)));
        }

        return $this->redirect($this->generateUrl('{{ route_name_prefix }}'));
    }

    return array(
        'entity'    => $entity,
        'edit_form' => $editForm->createView(),
    );
}
