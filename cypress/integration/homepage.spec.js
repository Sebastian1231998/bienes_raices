 /// <reference types="cypress"  /> 

 describe("Cargando la pagina principal", ()=>{

     it("probrando el header principal", ()=>{

       cy.visit('/');
     
       cy.get('[data-cy="heading-sitio"]').should('exist');
       cy.get('[data-cy="heading-sitio"]').invoke('text').should('equal' , 'Venta y departamentos exclusivos de lujo');
     }); 

     it('Probrando la seccion de Nosotors ', () => {
    
      cy.get('[data-cy="heading-nosotros"]').should('exist');
      cy.get('[data-cy="heading-nosotros"]').should('have.prop', 'tagName').should('equal', 'H2');

      cy.get('[data-cy="contenido-nosotros"]').find('.column-nosotros').should('have.length', 3);
    })

    it('Probando la seccion de anuncios', ()=>{


        cy.get('[data-cy="heading-anuncios"]').should('exist'); 
        cy.get('[data-cy="heading-anuncios"]').invoke('text').should('equal','Casas y Depas en Venta');


        cy.get('[data-cy="header-card"]').should('exist'); 
        cy.get('[data-cy="header-card"]').find('img'); 

        cy.get('[data-cy="button_card"]').should('exist');
        cy.get('[data-cy="button_card"]').invoke('attr','class').should('equal','button_card')
        cy.get('[data-cy="button_card"]').first().invoke('text').should('equal','Ver propiedad')

        cy.get('[data-cy="button_card"]').first().click()
        cy.get('[data-cy="heading-anuncio"]').should('exist');

        cy.wait(1000);

        cy.go('back');


        cy.get('[data-cy="button_todos"]').should('exist');
        cy.get('[data-cy="button_todos"]').invoke('attr','class').should('equal','button_todos')
        cy.get('[data-cy="button_todos"]').invoke('text').should('equal','Ver Todas')

        cy.get('[data-cy="button_todos"]').click()
        cy.get('[data-cy="page-heading-anuncio"]').should('exist');

        cy.go('back');
    })

    it('Probando la pagina de contacto', ()=>{

      cy.get('[data-cy="heading-contacto-index"]').should('exist');
      cy.get('[data-cy="heading-contacto-index"]').invoke('text').should('equal', 'Encuentra la casa de tus sueños');
      cy.get('[data-cy="heading-contacto-index"]').should('have.prop', 'tagName').should('equal', 'H2'); 


       cy.get('[data-cy="button_enlace"]').invoke('attr','href').should('equal', './contacto')
       .then( href =>{

           cy.visit(href);
       })

       cy.get('[data-cy="heading-page-contacto"]').should('exist');

       cy.visit('/')

    })

 }); 