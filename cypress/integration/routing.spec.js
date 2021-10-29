/// <reference types="cypress" />


describe('Cargando el routing', ()=>{
 
  it('probando el routing del header', ()=>{
    cy.visit('/');

    cy.get('[data-cy="navegacion-header"]').should('exist');
    cy.get('[data-cy="navegacion-header"]').find('a').should('have.length', 4)
    cy.get('[data-cy="navegacion-header"]').find('a').should('not.have.length', 3)


    cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('attr','href').should('equal', 'nosotros');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('text').should('equal', 'Nosotros');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(0).click()

    cy.get('[data-cy="page-nosotros-heading"]').should('exist');

    cy.wait(1000);
    cy.go('back') 

    cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('attr','href').should('equal', 'anuncios');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('text').should('equal', 'Anuncios');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(1).click()

    cy.get('[data-cy="page-heading-anuncio"]').should('exist');

    cy.wait(1000);
    cy.go('back') 


    cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('attr','href').should('equal', 'blog');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('text').should('equal', 'Blog');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(2).click()

    cy.get('[data-cy="page-heading-blog"]').should('exist');

    cy.wait(1000);
    cy.go('back') 


    cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('attr','href').should('equal', 'contacto');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('text').should('equal', 'Contacto');
    cy.get('[data-cy="navegacion-header"]').find('a').eq(3).click()

    cy.get('[data-cy="heading-page-contacto"]').should('exist');

    cy.wait(1000);
    cy.go('back') 



  })


  it('probando el routing del header', ()=>{
    cy.visit('/');

    cy.get('[data-cy="navegacion-footer"]').should('exist');
    cy.get('[data-cy="navegacion-footer"]').find('a').should('have.length', 4)
    cy.get('[data-cy="navegacion-footer"]').find('a').should('not.have.length', 3)


    cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('attr','href').should('equal', 'nosotros');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('text').should('equal', 'Nosotros');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).click()

    cy.get('[data-cy="page-nosotros-heading"]').should('exist');

    cy.wait(1000);
    cy.go('back') 

    cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('attr','href').should('equal', 'anuncios');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('text').should('equal', 'Anuncios');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).click()

    cy.get('[data-cy="page-heading-anuncio"]').should('exist');

    cy.wait(1000);
    cy.go('back') 


    cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('attr','href').should('equal', 'blog');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('text').should('equal', 'Blog');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).click()

    cy.get('[data-cy="page-heading-blog"]').should('exist');

    cy.wait(1000);
    cy.go('back') 


    cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('attr','href').should('equal', 'contacto');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('text').should('equal', 'Contacto');
    cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).click()

    cy.get('[data-cy="heading-page-contacto"]').should('exist');

    cy.wait(1000);
    cy.go('back') 



  })

})