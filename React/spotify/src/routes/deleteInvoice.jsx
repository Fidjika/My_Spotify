export function deleteInvoice(photo) {
    invoices = invoices.filter(
      (invoice) => invoice.photo !== photo
    );
  }